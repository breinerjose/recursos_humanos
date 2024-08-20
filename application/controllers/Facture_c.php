<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Facture_c extends CI_Controller {
	
	function __Construct(){
	   parent::__construct();
	   $this->load->model('basico_m','bas',	TRUE);
	}
	
	function envia_factura(){
$factura_xml = '<Factura> <Cabecera FechaEmision="2020-10-27" FormaDePago="2" HoraEmision="08:45:14" LineasDeFactura="2" MonedaFactura="COP" Numero="SETT1" Observaciones="FACTURA OCTUBRE" OrdenCompra="" TipoFactura="01" TipoOperacion="10" Vencimiento="2020-11-27"/> <NumeracionDIAN ConsecutivoFinal="5000000" ConsecutivoInicial="1" FechaFin="2030-01-19" FechaInicio="2019-01-19" NumeroResolucion="18760000001" PrefijoNumeracion="SETT"/> <Notificacion De="facturaelectronica@unitecnar.edu.co" Tipo="Mail"> <Para></Para> </Notificacion> <Emisor TipoPersona="1" TipoRegimen="49" TipoIdentificacion="31" NumeroIdentificacion="890481264" DV="1"  RazonSocial="FUNDACIÓN UNIVERSITARIA ANTONIO DE AREVALO" NombreComercia="FUNDACIÓN UNIVERSITARIA ANTONIO DE AREVALO"  > <CodigosCIIU> <CIIU> <CIIU>5229</CIIU> </CIIU> </CodigosCIIU> <Direccion CodigoDepartamento="13" CodigoMunicipio="13001" CodigoPais="CO" CodigoPostal="" Direccion="Avenida Pedro de Heredia, Calle 49A # 31-45, Sector Tesca" IdiomaPais="es" NombreCiudad="CARTAGENA" NombreDepartamento="BOLIVAR" NombrePais="COLOMBIA"/> <ObligacionesEmisor> <CodigoObligacion>O-09</CodigoObligacion> </ObligacionesEmisor> <DireccionFiscal CodigoDepartamento="13" CodigoMunicipio="13001" CodigoPais="CO" CodigoPostal="" Direccion="Avenida Pedro de Heredia, Calle 49A # 31-45, Sector Tesca" IdiomaPais="es" NombreCiudad="CARTAGENA" NombreDepartamento="BOLIVAR" NombrePais="COLOMBIA"/> </Emisor> <Cliente TipoPersona="2" TipoRegimen="" TipoIdentificacion="13" NumeroIdentificacion="73214641" DV="6" NombreComercial="BREINER JOSE LOPEZ BUSTAMANTE" RazonSocial=""   > <Direccion CodigoDepartamento="13" CodigoMunicipio="13001" CodigoPais="CO" CodigoPostal="" Direccion="CHAPACUA MZ F LT 27" IdiomaPais="es" NombreCiudad="CARTAGENA" NombreDepartamento="BOLIVAR" NombrePais="COLOMBIA"/> <ObligacionesCliente> <CodigoObligacion>R-99-PN</CodigoObligacion> </ObligacionesCliente> <DireccionFiscal CodigoDepartamento="13" CodigoMunicipio="13001" CodigoPais="CO" CodigoPostal="" Direccion="CHAPACUA MZ F LT 27" IdiomaPais="es" NombreCiudad="" NombreDepartamento="" NombrePais="COLOMBIA"/> </Cliente> <MediosDePago CodigoMedioPago=""/> <Totales Bruto="500000" BaseImponible="0.00" BrutoMasImpuestos="500000" Cargos="0.00" Descuentos="0.0" Impuestos="0.00" Retenciones="0.00" General="500000" Anticipo="0.0" Redondeo="0.00" /> <Linea> <Detalle Cantidad="1.00" CantidadBase="1.00" Descripcion="CERTIFICADO DE NOTAS" NumeroLinea="1" PrecioUnitario="100000" SubTotalLinea="100000" UnidadCantidadBase="0" UnidadMedida="94" ValorTotalItem="100000" /> <CodificacionesEstandar> <CodificacionEstandar  CodigoArticulo="MAT0005"  CodigoEstandar="999"  /> </CodificacionesEstandar> </Linea> <Linea> <Detalle Cantidad="1.00" CantidadBase="1.00" Descripcion="VALIDACION" NumeroLinea="2" PrecioUnitario="400000" SubTotalLinea="400000" UnidadCantidadBase="0" UnidadMedida="94" ValorTotalItem="400000" /> <CodificacionesEstandar> <CodificacionEstandar  CodigoArticulo="MAT00013"  CodigoEstandar="999"  /> </CodificacionesEstandar> </Linea> <Extensiones> <DatosAdicionales> <campoAdicional Nombre="Extension1" Valor="BREINER JOSE LOPEZ BUSTAMANTE"/> <campoAdicional Nombre="Extension2" Valor="3162769810"/> <campoAdicional Nombre="ValorEnLetras" Valor="QUINIENTOS MIL PESOS MCTE."/> <campoAdicional Nombre="Leyenda" Valor="Esta factura se asimila en sus efectos a una Letra de Cambio. Según art. 744 del Código de Comercio Favor consignar a la Cuenta de Ahorro N° 085-99999999 de BANCOLOMBIA."/> </DatosAdicionales> </Extensiones> </Factura>';


//TRAER EL TOKEN DE AUTORIZACIÓN
$token_request = curl_init();

curl_setopt_array($token_request, array(
  CURLOPT_URL => "https://plcolabbeta.azure-api.net/Auth/Login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{'u': '890481264','p': 'JBTtsZPFQadpErlTsrBR'}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "X-Who: 71059661891f454087cd268822c2cf27"
  ),
));

$token = json_decode(curl_exec($token_request))->accessToken;


curl_close($token_request);

// fin traer token 



//GENERAR FACTURA INICIO
$g_factura_request = curl_init();

curl_setopt_array($g_factura_request, array(
  CURLOPT_URL => "https://plcolabbeta.azure-api.net/Issue/XML3",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $factura_xml,
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/xml",
    "Accept: application/json",
    "Authorization: Bearer ".$token,
    "X-REF-DOCUMENTTYPE: FACTURA-UBL",
    "X-KEYCONTROL: fc8eac422eba16e22ffd8c6f94b3f40a6e38162c",
    "X-ASYNC: false",
    "X-Who: 71059661891f454087cd268822c2cf27"
  ),
));

$respuesta_factura = curl_exec($g_factura_request);
if(curl_exec($g_factura_request) === false)
{
    echo 'Curl error: ' . curl_error($g_factura_request);
}
else
{
    echo 'Operación completada sin errores';
}
curl_close($g_factura_request);
echo $respuesta_factura;


//GENERAR FACTURA FIN
}
	
}