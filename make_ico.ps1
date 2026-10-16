$pngBytes = [System.IO.File]::ReadAllBytes((Resolve-Path "public/assets/img/favicon-tab.png"))
$pngLen = $pngBytes.Length

# ICO header (6 bytes)
$icoHeader = [byte[]]@(0, 0, 1, 0, 1, 0)

# Icon directory entry (16 bytes)
# Width = 64 (or 0 for 256), Height = 64, Colors = 0, Reserved = 0, Planes = 1, BPP = 32, Size = pngLen, Offset = 22
$icoEntry = New-Object byte[] 16
$icoEntry[0] = 64 # width
$icoEntry[1] = 64 # height
$icoEntry[2] = 0  # colors
$icoEntry[3] = 0  # reserved
$icoEntry[4] = 1  # color planes
$icoEntry[5] = 0
$icoEntry[6] = 32 # bpp
$icoEntry[7] = 0
# Size of image data (4 bytes, little endian)
[System.BitConverter]::GetBytes([int]$pngLen).CopyTo($icoEntry, 8)
# Offset of image data (4 bytes, little endian, 6 + 16 = 22)
[System.BitConverter]::GetBytes([int]22).CopyTo($icoEntry, 12)

# Write out full ICO file
$fs = [System.IO.File]::Create((Resolve-Path "public/favicon.ico"))
$fs.Write($icoHeader, 0, $icoHeader.Length)
$fs.Write($icoEntry, 0, $icoEntry.Length)
$fs.Write($pngBytes, 0, $pngBytes.Length)
$fs.Close()

Write-Host "Created valid 64x64 PNG-embedded favicon.ico ($($pngLen + 22) bytes)"
