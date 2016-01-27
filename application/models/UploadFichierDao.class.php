<?php
class UploadFichierDao {

	private $Fichier        	= '';
	private $Nom            	= '';
	private $Repertoire     	= '';
	private $Nbfichier      	= '';
	private $Size           	= '';
	private $Temp           	= '';
	private $Type           	= '';
	private $TaillemaximumValides   ='';
	private $TypesValides   	= array();
	public $fichierconcerne     = array();
	

	public function __construct($Fichier, $repertoirdedepot ,$TaillemaximumValides ,$TypesValides)
		{
			$this->Temp =  $Fichier['tmp_name'];
			$this->Nom = $Fichier['name'];
			$this->Size =$Fichier['size'];
			$this->Type =$Fichier['type'];
			$this->Repertoire = $repertoirdedepot;
			$this->TaillemaximumValides = $TaillemaximumValides;
			$this->TypesValides = $TypesValides;
			$this->Nbfichier =count($this->Nom);
		}

	public function UploadFichier()
		{	
			$lesfichiertropgros = array();
			$pasbonneextentionarray = array();
			for ($i=0; $i<$this->Nbfichier; $i++) { 
				if(($this->Nom[$i])=='')
				{	
    				throw new Exception("absent");
				}
				elseif (!file_exists($this->Repertoire)) {
    				throw new Exception("nodirectory");
				}
				elseif(($this->TaillemaximumValides < $this->Size[$i])&&($this->TaillemaximumValides!=null))
				{	
					array_push($lesfichiertropgros, $this->Nom[$i]);
					$this->tailletropimportante($lesfichiertropgros);
				}
				elseif((in_array($this->Type[$i], $this->TypesValides))==FALSE)
				{	
					array_push($pasbonneextentionarray, $this->Nom[$i]);
					throw new Exception("estentionpb");
					$this->pasbonneextention($pasbonneextentionarray);
				}
				else{
					$this->Nom[$i]= str_replace(" ","_", $this->Nom[$i]);
					$this->DeplacerleFichier($this->Temp[$i], $this->Repertoire.$this->Nom[$i]);
				}
			}
		}

	public function DeplacerleFichier($a, $b)
		{	
			if (move_uploaded_file($a, $b)) {
				throw new Exception("bueno");
			}
			else {
				throw new Exception("bigpb");
			}

		}

	public function tailletropimportante($a)
		{
			$this->fichierconcerne = $a;
			throw new Exception("tobigtaille");

			/*$this->Erreur= 'la taille ';
			if(count($a)>1){
			$this->Erreur .='des fichiers : ';
			} else {
			$this->Erreur .=' du fichier : ';
			}
			for ($i=0; $i < count($a); $i++) { 
			$this->Erreur .= '<br>'.$a[$i];
			}
			$this->Erreur .='<br> est trop importante';*/
		}
	public function pasbonneextention($a)
		{
			$this->Erreur= 'L\'extention ';
			if(count($a)>1){
			$this->Erreur .='des fichiers : ';
			} else {
			$this->Erreur .=' du fichier : ';
			}
			for ($i=0; $i < count($a); $i++) { 
			$this->Erreur .= '<br>'.$a[$i];
			}
			$this->Erreur .='<br> n\'est pas valide';
		}
}

