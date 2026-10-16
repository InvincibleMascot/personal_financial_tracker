Add-Type -AssemblyName System.Drawing

$srcPath = Resolve-Path "public/assets/img/logo.jpg"
$bmp = [System.Drawing.Bitmap]::FromFile($srcPath)

$w = $bmp.Width
$h = $bmp.Height
Write-Host "Dimensions: $w x $h"

# Find bounding box of non-background pixels
# Background is roughly off-white ~ #f8f8f8 / #fafafa
$bg = $bmp.GetPixel(5, 5)
Write-Host "BG color: R=$($bg.R) G=$($bg.G) B=$($bg.B)"

# Let's find vault circle bounds (top portion) and text bounds (bottom portion)
$minX = $w
$maxX = 0
$minY = $h
$maxY = 0

# Sample every 4 pixels for speed
for ($y = 0; $y -lt $h; $y += 2) {
    for ($x = 0; $x -lt $w; $x += 2) {
        $p = $bmp.GetPixel($x, $y)
        $diff = [Math]::Abs([int]$p.R - [int]$bg.R) + [Math]::Abs([int]$p.G - [int]$bg.G) + [Math]::Abs([int]$p.B - [int]$bg.B)
        if ($diff -gt 25) {
            if ($x -lt $minX) { $minX = $x }
            if ($x -gt $maxX) { $maxX = $x }
            if ($y -lt $minY) { $minY = $y }
            if ($y -gt $maxY) { $maxY = $y }
        }
    }
}

Write-Host "Total content bounding box: X=[$minX, $maxX], Y=[$minY, $maxY]"

# Let's also find the boundary between the vault door and "THE VAULT CO" text
# Look for a gap row in Y between y=450 and y=550 where pixels are mostly BG
$gapY = 0
for ($y = 450; $y -lt 550; $y++) {
    $nonBgCount = 0
    for ($x = $minX; $x -le $maxX; $x += 2) {
        $p = $bmp.GetPixel($x, $y)
        $diff = [Math]::Abs([int]$p.R - [int]$bg.R) + [Math]::Abs([int]$p.G - [int]$bg.G) + [Math]::Abs([int]$p.B - [int]$bg.B)
        if ($diff -gt 25) { $nonBgCount++ }
    }
    if ($nonBgCount -eq 0) {
        $gapY = $y
        break
    }
}

Write-Host "Gap between vault door and text: Y=$gapY"
$bmp.Dispose()
