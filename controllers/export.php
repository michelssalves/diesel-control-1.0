<?php
session_start();
include '../assets/controllers/config.php';
$id_funcionario = $_SESSION['id_funcionario'];
$tipo_acesso = $_SESSION['tipo_acesso'] ;
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$matricula = $_SESSION['matricula'];
$token = $_SESSION['token'];
include '../assets/controllers/checkAcess.php';

$data_abastecimento = date_create($_POST['data_abastecimento']);
$data_abastecimento1 = date_format($data_abastecimento, 'Y-m-d H:i:s');
//$numero_equipamento = $_POST['numero_equipamento'];
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 

// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('DATA-HORA',
'DATA', 
'PREFIXO', 
'ULTIMO KM',
'KM', 'DIFERENCA', 
'HR',
'LITROS',
'LITROS OD',
'MEDIA', 
'MARCA',
'MODELO',  
'SETOR',
'PREFIXO SAP', 
'PLACA',
'COMBUSTIVEL', 
'OD INICIAL', 
'OD FINAL',
'BOMBA', 
'FRENTISTA',
'HORA'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 

$sql = $pdo->prepare("SELECT * FROM veiculos AS v  
JOIN abastecimentos AS a 
ON a.id_veiculo = v.id_veiculo
WHERE dataabastecimento2 = :data_abastecimento1");
$sql->bindValue(':data_abastecimento1', $data_abastecimento1);
$sql->execute();
if($sql->rowCount() > 0){
    // Output each row of the data 
    
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    
   foreach ($lista as $row){
 
        $lineData = array(
            date('d/m/Y H:i:s',strtotime($row['data_abastecimento'])),
            date('d/m/Y',strtotime($row['data_abastecimento'])), 
            $row['prefixo'],
            $row['ultimokm'],
            $row['km'], 
            $row['diferencakm'], 
            $row['hr'], 
            $row['litros'], 
            $row['litros_od'],
            $row['media'],
            $row['marca'],
            $row['modelo'],
            $row['setor'],
            $row['numero_equipamento'],
            $row['placa'], 
            $row['combustivel'], 
            $row['odometroinicial'], 
            $row['odometrofinal'], 
            $row['bomba'], 
            $row['frentista'],
            date('H:i:s',strtotime($row['data_abastecimento'])),
            );
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    }
        
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
?>