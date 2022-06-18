<?php
include('../login/verifica_login_uploadpremio.php');
if (!isset($_SESSION)) {
    session_start();
}
require_once ('../conexao01.php');
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
	
		
		$linhas = $arquivo->getElementsByTagName("Row");
		
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
			    
				$id_funcionario = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				$data_premio = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				$event1 = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				$event2 = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				$event3 = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				$event4 = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				$event5 = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
				$event6 = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
				$event7 = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
				$event8 = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
				$event9 = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
				$event10 = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
				$event11 = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
				$event12 = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
				$event13 = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
				$event14 = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
				$event15 = $linha->getElementsByTagName("Data")->item(16)->nodeValue;
		        $event16 = $linha->getElementsByTagName("Data")->item(17)->nodeValue;
				$event17 = $linha->getElementsByTagName("Data")->item(18)->nodeValue;
				$event18 = $linha->getElementsByTagName("Data")->item(19)->nodeValue;
				$event19 = $linha->getElementsByTagName("Data")->item(20)->nodeValue;
				$event20 = $linha->getElementsByTagName("Data")->item(21)->nodeValue;
				$pontos = $linha->getElementsByTagName("Data")->item(22)->nodeValue;
				$valor_recebido = $linha->getElementsByTagName("Data")->item(23)->nodeValue;
                
		
				//Inserir o usuário no BD
                $sql = $pdo->prepare("INSERT INTO premio (
                    id_funcionario, 
                    data_premio, 
                    event1, 
                    event2,
                    event3, 
                    event4, 
                    event5, 
                    event6, 
                    event7, 
                    event8, 
                    event9, 
                    event10,
                    event11, 
                    event12, 
                    event13, 
                    event14, 
                    event15,
                    event16, 
                    event17, 
                    event18, 
                    event19, 
                    event20,
                    pontos,
                    valor_recebido
                   
                    ) VALUES(
                    :id_funcionario, 
                    :data_premio, 
                    :event1, 
                    :event2,
                    :event3, 
                    :event4, 
                    :event5, 
                    :event6, 
                    :event7, 
                    :event8, 
                    :event9, 
                    :event10,
                     :event11, 
                    :event12, 
                    :event13, 
                    :event14, 
                    :event15,
                    :event16, 
                    :event17, 
                    :event18, 
                    :event19, 
                    :event20,
                    :pontos,
                    :valor_recebido
                    
                    
                  
                    )");
                $sql->bindValue(':id_funcionario', $id_funcionario);
                $sql->bindValue(':data_premio', $data_premio);
                $sql->bindValue(':event1', $event1);
                $sql->bindValue(':event2', $event2);
                $sql->bindValue(':event3', $event3);
                $sql->bindValue(':event4', $event4);
                $sql->bindValue(':event5', $event5);
                $sql->bindValue(':event6', $event6);
                $sql->bindValue(':event7', $event7);
                $sql->bindValue(':event8', $event8);
                $sql->bindValue(':event9', $event9);
                $sql->bindValue(':event10', $event10);
                $sql->bindValue(':event11', $event11);
                $sql->bindValue(':event12', $event12);
                $sql->bindValue(':event13', $event13);
                $sql->bindValue(':event14', $event14);
                $sql->bindValue(':event15', $event15);
                $sql->bindValue(':event16', $event16);
                $sql->bindValue(':event17', $event17);
                $sql->bindValue(':event18', $event18);
                $sql->bindValue(':event19', $event19);
                $sql->bindValue(':event20', $event20);
                $sql->bindValue(':pontos', $pontos);
                $sql->bindValue(':valor_recebido', $valor_recebido);
                
                $sql->execute();
			}
			$primeira_linha = false;
		}
	}
	header('location: ../upload_premio/uploadPremioHtml.php');
?>