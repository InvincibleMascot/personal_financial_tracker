Add-Type -AssemblyName System.Drawing

$srcFile = Resolve-Path "public/assets/img/logo.jpg"
$src = [System.Drawing.Bitmap]::FromFile($srcFile)

# 1. TIGHT CROP OF THE VAULT DOOR ONLY:
# Vault door bounds: X: 146 to 608 (W: 462), Y: 64 to 516 (H: 452)
# Center: X=377, Y=290
# We will create a perfectly centered square of 470x470 around (377, 290)
$doorSize = 470
$cropX = 377 - [int]($doorSize / 2) # 142
$cropY = 290 - [int]($doorSize / 2) # 55

Write-Host "Door crop: X=$cropX, Y=$cropY, size=$doorSize"

$doorRaw = New-Object System.Drawing.Bitmap($doorSize, $doorSize, [System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
$g = [System.Drawing.Graphics]::FromImage($doorRaw)
$g.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
$g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
$g.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
$g.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality
$g.DrawImage($src, (New-Object System.Drawing.Rectangle(0, 0, $doorSize, $doorSize)), $cropX, $cropY, $doorSize, $doorSize, [System.Drawing.GraphicsUnit]::Pixel)
$g.Dispose()

# Convert background to transparent and remove any accidental text at the very bottom
$doorTrans = New-Object System.Drawing.Bitmap($doorSize, $doorSize, [System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
for ($y = 0; $y -lt $doorSize; $y++) {
    for ($x = 0; $x -lt $doorSize; $x++) {
        # Any pixels below Y=460 in this cropped area that belong to "THE" text should be cleared
        if ($y -gt 458) {
            $doorTrans.SetPixel($x, $y, [System.Drawing.Color]::FromArgb(0, 0, 0, 0))
            continue
        }

        $p = $doorRaw.GetPixel($x, $y)
        # Background is off-white (~244-248)
        # Let's do smooth alpha blending for smooth anti-aliased edges
        $brightness = ([int]$p.R + [int]$p.G + [int]$p.B) / 3.0
        
        if ($brightness -ge 243) {
            # Fully transparent background
            $doorTrans.SetPixel($x, $y, [System.Drawing.Color]::FromArgb(0, 0, 0, 0))
        } elseif ($brightness -gt 228) {
            # Smooth feather edge
            $alpha = [int](255 * (243 - $brightness) / 15.0)
            if ($alpha -lt 0) { $alpha = 0 }
            if ($alpha -gt 255) { $alpha = 255 }
            $doorTrans.SetPixel($x, $y, [System.Drawing.Color]::FromArgb($alpha, $p.R, $p.G, $p.B))
        } else {
            # Solid door pixel
            $doorTrans.SetPixel($x, $y, [System.Drawing.Color]::FromArgb(255, $p.R, $p.G, $p.B))
        }
    }
}

$doorTrans.Save("public/assets/img/vault-symbol.png", [System.Drawing.Imaging.ImageFormat]::Png)
Write-Host "Saved public/assets/img/vault-symbol.png"

# 2. SAVE CRISP SIZES FOR FAVICON & ICONS
function Resize-Bmp($srcBmp, $w, $h, $padRatio = 0.0) {
    $res = New-Object System.Drawing.Bitmap($w, $h, [System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
    $gr = [System.Drawing.Graphics]::FromImage($res)
    $gr.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
    $gr.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
    $gr.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
    $gr.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality

    $pad = [int]($w * $padRatio)
    $drawW = $w - ($pad * 2)
    $drawH = $h - ($pad * 2)

    $gr.DrawImage($srcBmp, $pad, $pad, $drawW, $drawH)
    $gr.Dispose()
    return $res
}

# Favicons (transparent, tight, metallic door fills frame!)
$fav16 = Resize-Bmp $doorTrans 16 16 0.0
$fav32 = Resize-Bmp $doorTrans 32 32 0.0
$fav48 = Resize-Bmp $doorTrans 48 48 0.0
$fav64 = Resize-Bmp $doorTrans 64 64 0.0
$fav128 = Resize-Bmp $doorTrans 128 128 0.0
$fav180 = Resize-Bmp $doorTrans 180 180 0.02
$fav256 = Resize-Bmp $doorTrans 256 256 0.02

$fav32.Save("public/assets/img/favicon-32x32.png", [System.Drawing.Imaging.ImageFormat]::Png)
$fav48.Save("public/assets/img/favicon-48x48.png", [System.Drawing.Imaging.ImageFormat]::Png)
$fav180.Save("public/assets/img/apple-touch-icon.png", [System.Drawing.Imaging.ImageFormat]::Png)
$fav256.Save("public/assets/img/favicon-256x256.png", [System.Drawing.Imaging.ImageFormat]::Png)
$fav64.Save("public/favicon.png", [System.Drawing.Imaging.ImageFormat]::Png)

# Also create high-contrast favicon with a dark/metallic rounded badge for maximum tab visibility
$favTabBadge = New-Object System.Drawing.Bitmap(64, 64, [System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
$gt = [System.Drawing.Graphics]::FromImage($favTabBadge)
$gt.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
$gt.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
$gt.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
$gt.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality

# Dark blue circle backing
$brush = New-Object System.Drawing.SolidBrush([System.Drawing.Color]::FromArgb(255, 10, 28, 61))
$gt.FillEllipse($brush, 1, 1, 62, 62)
# Subtle ring
$pen = New-Object System.Drawing.Pen([System.Drawing.Color]::FromArgb(200, 96, 165, 250), 2)
$gt.DrawEllipse($pen, 2, 2, 60, 60)
# Draw vault door inside
$gt.DrawImage($doorTrans, 6, 6, 52, 52)
$gt.Dispose()
$favTabBadge.Save("public/assets/img/favicon-tab.png", [System.Drawing.Imaging.ImageFormat]::Png)

# Also save high-res favicon.ico
# In Windows .NET, we can write an ICO file or save PNG directly as favicon.ico (modern browsers support PNG inside ICO)
$fav32.Save("public/favicon.ico", [System.Drawing.Imaging.ImageFormat]::Png)

# 3. TIGHT CROP OF FULL LOGO (VAULT DOOR + "THE VAULT CO"):
# Original image is 736x736, but content is from X:146 to X:610 (W:464), Y:64 to Y:654 (H:590)
$fullW = 468
$fullH = 594
$fullCropX = 144
$fullCropY = 62

$fullLogo = New-Object System.Drawing.Bitmap($fullW, $fullH, [System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
$gf = [System.Drawing.Graphics]::FromImage($fullLogo)
$gf.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
$gf.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
$gf.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
$gf.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality
$gf.DrawImage($src, (New-Object System.Drawing.Rectangle(0, 0, $fullW, $fullH)), $fullCropX, $fullCropY, $fullW, $fullH, [System.Drawing.GraphicsUnit]::Pixel)
$gf.Dispose()
$fullLogo.Save("public/assets/img/logo-full-tight.png", [System.Drawing.Imaging.ImageFormat]::Png)
Write-Host "Saved public/assets/img/logo-full-tight.png"

# 4. ALSO CREATE A HORIZONTAL BRAND LOGO (Vault Door icon on left + crisp typography on right)
# Perfect for sidebar headers, topbars, invoices, reports!
$hW = 280
$hH = 64
$hLogo = New-Object System.Drawing.Bitmap($hW, $hH, [System.Drawing.Imaging.PixelFormat]::Format32bppArgb)
$gh = [System.Drawing.Graphics]::FromImage($hLogo)
$gh.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
$gh.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
$gh.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
$gh.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality

# Draw the 56px door on left
$gh.DrawImage($doorTrans, 4, 4, 56, 56)
$gh.Dispose()
$hLogo.Save("public/assets/img/vault-horizontal-base.png", [System.Drawing.Imaging.ImageFormat]::Png)

# Cleanup
$fav16.Dispose()
$fav32.Dispose()
$fav48.Dispose()
$fav64.Dispose()
$fav128.Dispose()
$fav180.Dispose()
$fav256.Dispose()
$favTabBadge.Dispose()
$fullLogo.Dispose()
$doorRaw.Dispose()
$doorTrans.Dispose()
$src.Dispose()

Write-Host "All logo and favicon assets created successfully!"
