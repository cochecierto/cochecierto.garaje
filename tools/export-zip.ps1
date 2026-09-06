# Script de empaquetado estándar para CocheCierto Garaje
# Genera archivos ZIP con separadores Unix (/) compatibles con el descompresor de WordPress en Linux
param (
    [string] = 'C:\Users\ernes\Documents\COCHECIERTO\Garaje_zip'
)

Continue = 'Stop'
[System.IO.Directory]::CreateDirectory() | Out-Null

Write-Host  Empaquetando cochecierto-garage-child... -ForegroundColor Cyan
tar -a -c -f \cochecierto-garage-child.zip -C theme cochecierto-garage-child
tar -a -c -f \cochecierto-garage-child_20260906_v0.4.3.zip -C theme cochecierto-garage-child

if (Test-Path plugins\cochecierto-garage-core) {
    Write-Host Empaquetando cochecierto-garage-core... -ForegroundColor Cyan
    tar -a -c -f \cochecierto-garage-core.zip -C plugins cochecierto-garage-core
}

Write-Host ZIPs generados con éxito en:  -ForegroundColor Green
Get-ChildItem  | Select-Object Name, Length, LastWriteTime | Format-Table