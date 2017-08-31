<?php    @session_start();    if(!isset($ganadores)){        require '../vendor/autoload.php';        require '../conection.php';        $operacion = $_REQUEST['operacion'];    }     // $operacion = $_REQUEST['operacion'];    //LE MANDAMOS UNA OPERACION Y DEPENDIENDO LA OPERACION QUE VAYAMOS REALIZAR MANDAMOS LLAMAR NUESTRA FUNCION    //USAMOS EL REQUEST POR QUE PUEDEN LLEGAR PETICIONES DE TIPO GET O DE TIPO POST Y ASI NOS EVITAMOS PROBLEMAS   switch ($operacion){       case 'login':            $obj = new base_helper_database;            $obj->login($_POST['nombre'],$_POST['contrasenia']);           break;       case 'logout':           $obj = new base_helper_database;           $obj->logout();           break;       case 'listacandidatas':           $obj = new base_helper_database;           $candidatas = $obj->listacandidatas();           break;       case 'candidatasAll':           $obj = new base_helper_database;           $lista = $obj->candidatasAll();           break;       case 'candidataEspecifica':           $obj = new base_helper_database;           //$id = $_REQUEST['idCandidata'];           $candidata = $obj->candidataEspecifica($idCandidata);           break;       case 'calificar':           $obj = new base_helper_database;           $obj->calificar($_POST);           break;       case 'pdf1':           $obj = new base_helper_database;           $obj->generarPDF();           break;   }    class base_helper_database{        public function __construct(){ }        /************************************************************************************         * A ESTE METODO SE LE MANDA DOS PARAMETROS PARA REALIZAR EL LOGIN ,         * SI SE REALIZA EL LOGIN ENTONCES CREA DOS VARIABLES DE SESSION         * QUE CONTIENEN EL NOMBRE DE USUARIO Y CONTRASEÑA         * @param $nombre         * @param $contrasenia         ************************************************************************************/        public function login($nombre,$contrasenia){            $jz = new juez();            $response = $jz->where('nombre',$nombre)->where('contrasenia',$contrasenia);            if($response->exists()){                // @session_start();                // $_SESSION['id'] = $response['idc_juez'];                $response = $response->get()->toArray();                // print_r($response);                $_SESSION['id'] = $response[0]['idc_juez'];                $_SESSION['nombre'] = $nombre;                $_SESSION['contrasenia'] = $contrasenia;                echo "exito";            }else{              echo "error";            }        }        /*******************************************************************************         * ESTA FUNCION CUANDO SE MANDA LLAMAR DESTROYE TODAS LAS VARIABLES DE SESSION         * Y LA SESSION POR COMPLETO         *******************************************************************************/        public function logout(){            unset($_SESSION['nombre']);            unset($_SESSION['contrasenia']);            unset($_SESSION['id']);            session_destroy();            header("Location:../");        }        /********************************************************************************************         *  ESTE METODO OBTIENE TODA LA LISTA DE CANDIDATAS DE LA BASE DE DATOS         *********************************************************************************************/        public function listacandidatas(){            $c = new candidata();            //$candidatas = $c->with('calificacion')->get()->toArray();            $candidatas = $c->with('calificacion')->get()->toArray();           $candidatas =  $this->order($candidatas);           return $candidatas;        }        /****************************************************************************************************         * ESTE METODO LO HACEMOS PARA ACOMODAR LOS DATOS Y SALGAN DE MAYOR A MENOR         ****************************************************************************************************/        public function order($candidatas){            for ($i = 0; $i < count($candidatas); $i++){                for ($j = $i+1; $j < count($candidatas); $j++){                    $suma1 = $this->sumarCalifiacion($candidatas[$i]['calificacion']);                    $suma2 = $this->sumarCalifiacion($candidatas[$j]['calificacion']);                    if($suma1<$suma2){                        $temp = $candidatas[$i];                        $candidatas[$i] = $candidatas[$j];                        $candidatas[$j] = $temp;                    }                }            }            return $candidatas;        }        /****************************************************************************************************         * METODO QUE HACE LA SUMA DE LAS CALIFICACION         ****************************************************************************************************/        public function sumarCalifiacion($califiaciones){            $suma = 0;            foreach ($califiaciones as $c) {                $suma += $c['calificacion'];            }            return $suma;        }        public function candidatasAll(){            $lista = candidata::get()->toArray();            return $lista;        }        public function candidataEspecifica($id){            $candidata = candidata::where('idcandidata','=',$id)->get()->toArray();            // print_r($candidata);            return $candidata;        }        public function calificar($post){            print_r($post);           $this->esqueletoCalificacion($post['idJuez'],$post['idCandidata'],1,$post['belleza']);           $this->esqueletoCalificacion($post['idJuez'],$post['idCandidata'],2,$post['personalidad']);           $this->esqueletoCalificacion($post['idJuez'],$post['idCandidata'],3,$post['presentacion']);           $this->esqueletoCalificacion($post['idJuez'],$post['idCandidata'],4,$post['elegancia']);           $this->esqueletoCalificacion($post['idJuez'],$post['idCandidata'],5,$post['preguntaFinal']);        }        public function esqueletoCalificacion($idJuez, $idCandidata, $parametro, $cal){            $calificacion = new calificacion();            $calificacion->id_juez = $idJuez;            $calificacion->id_candidata = $idCandidata;            $calificacion->id_parametro = $parametro;            $calificacion->calificacion = $cal;           if( $calificacion->save()){               echo "si";           }else{               echo "no";           }        }        /******************************************************************************************************         * OBTENER LISTA DE JUECES         ******************************************************************************************************/        public function listaJuezes(){            $juezes = new juez();            return $juezes->get()->toArray();        }        /******************************************************************************************************         * OBTENER LISTA DE JUECES         ******************************************************************************************************/        public function contarJueces(){            $juezes = new juez();            return $juezes->get()->count();        }        public function generarPDF(){            echo "About to create pdf";            $pdf = new FPDF();            $pdf->AddPage();            $pdf->SetFont('Arial','B',16);            $pdf->Cell(40,10,'Hello World!');            $pdf->Output();        }    }?>