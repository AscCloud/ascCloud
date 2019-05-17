<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;

class FacturacionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrador');
    }

    function crearXml(){
        $filexml="C:/xampp/htdocs/esquemas offline/factura_2_1_0.xml";
        $schema="C:/xampp/htdocs/esquemas offline/factura_2_1_0.xsd";
        $rucem='0504043258001';
        $xml=new DomDocument('1.0', 'UTF-8');
        $xml->load($filexml);
        $Factura = $xml->createElement('Factura');
        $Factura = $xml->appendChild($Factura);
        // $Factura->setAttributeNS( "comprobante","version","1.0.0");
        // INFORMACION TRIBUTARIA.
        $infoTributaria = $xml->createElement('infoTributaria');
        $infoTributaria = $Factura->appendChild($infoTributaria);
        $cbc = $xml->createElement('ambiente','01');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('tipoEmision', '1');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('razonSocial', '1');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('nombreComercial', '1');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('ruc', $rucem);
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('claveAcceso', '1');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('codDoc', '1');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('estab', '1');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('ptoEmi', '001');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('secuencial', '001');
        $cbc = $infoTributaria->appendChild($cbc);
        $cbc = $xml->createElement('dirMatriz', 'direccion matris');
        $cbc = $infoTributaria->appendChild($cbc);
        // INFORMACIOO DE FACTURA.
        $infoFactura = $xml->createElement('infoFactura');
        $infoFactura = $Factura->appendChild($infoFactura);
        $cbc = $xml->createElement('fechaEmision','01');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('dirEstablecimiento', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('contribuyenteEspecial', '000');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('obligadoContabilidad', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('tipoIdentificacionComprador', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('razonSocialComprador', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('identificacionComprador', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('totalSinImpuestos', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('totalDescuento', '001');
        $cbc = $infoFactura->appendChild($cbc);


        $totalConImpuestos = $xml->createElement('totalConImpuestos');
        $totalConImpuestos = $infoFactura->appendChild($totalConImpuestos);
        $totalImpuesto = $xml->createElement('totalImpuesto');
        $totalImpuesto = $totalConImpuestos->appendChild($totalImpuesto);
        $cbc = $xml->createElement('codigo', '001');
        $cbc = $totalImpuesto->appendChild($cbc);
        $cbc = $xml->createElement('codigoPorcentaje', '001');
        $cbc = $totalImpuesto->appendChild($cbc);
        $cbc = $xml->createElement('descuentoAdicional', '001');
        $cbc = $totalImpuesto->appendChild($cbc);
        $cbc = $xml->createElement('baseImponible', '001');
        $cbc = $totalImpuesto->appendChild($cbc);
        $cbc = $xml->createElement('valor', '001');
        $cbc = $totalImpuesto->appendChild($cbc);

        $cbc = $xml->createElement('propina', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('importeTotal', '1');
        $cbc = $infoFactura->appendChild($cbc);
        $cbc = $xml->createElement('moneda', 'DOLAR');
        $cbc = $infoFactura->appendChild($cbc);
        //DETALLES DE LA FACTURA.
	    $detalles = $xml->createElement('detalles');
        $detalles = $Factura->appendChild($detalles);

        $descripcion = '';
        $i = 0;

        // EMULANDO LA CONSULTA A LA BASE DE DATOS DE UN SELECT
        $lineas = array(

            "1" =>array
            (
                "descripcion"=>"descripcion del producto 1",
                "precioUnitario"=>"200",
                "cantidad"=>"21"
            ),
            "2" =>array
            (
                "descripcion"=>"descricon del producto 2",
                "precioUnitario"=>"100",
                "cantidad"=>"12"
            )
        );

        foreach ($lineas as $d) {
            $i++;
            $numerolinea = $i;
            $detalle = $xml->createElement('detalle');
            $detalle = $detalles->appendChild($detalle);
            $cbc = $xml->createElement('codigoPrincipal', '1');
            $cbc = $detalle->appendChild($cbc);
            $cbc = $xml->createElement('codigoAuxiliar', '1');
            $cbc = $detalle->appendChild($cbc);
            $cbc = $xml->createElement('descripcion', $d["descripcion"].' / '.$numerolinea );
            $cbc = $detalle->appendChild($cbc);
            $cbc = $xml->createElement('cantidad', $d["cantidad"]);
            $cbc = $detalle->appendChild($cbc);
            $cbc = $xml->createElement('precioUnitario', $d["precioUnitario"]);
            $cbc = $detalle->appendChild($cbc);
            $cbc = $xml->createElement('descuento', '0.00');
            $cbc = $detalle->appendChild($cbc);
            $cbc = $xml->createElement('precioTotalSinImpuesto', '1');
            $cbc = $detalle->appendChild($cbc);
            $impuestos = $xml->createElement('impuestos');
            $impuestos = $detalle->appendChild($impuestos);
            $impuesto = $xml->createElement('impuesto');
            $impuesto = $impuestos->appendChild($impuesto);
            $cbc = $xml->createElement('codigo', '001');
            $cbc = $impuesto->appendChild($cbc);
            $cbc = $xml->createElement('codigoPorcentaje', '001');
            $cbc = $impuesto->appendChild($cbc);
            $cbc = $xml->createElement('tarifa', '001');
            $cbc = $impuesto->appendChild($cbc);
            $cbc = $xml->createElement('baseImponible', '001');
            $cbc = $impuesto->appendChild($cbc);
            $cbc = $xml->createElement('valor', '001');
            $cbc = $impuesto->appendChild($cbc);
        }
        $xml->formatOutput = true;
        $strings_xml       = $xml->saveXML();
        $xml->save('C:/Users/Mauricio/Documents/Laravel/ascCloud/Documentos_Facturacion_Electronica/FacturasXml/Generadas/'.$rucem.'74902020320953.xml');
        chmod('C:/Users/Mauricio/Documents/Laravel/ascCloud/Documentos_Facturacion_Electronica/FacturasXml/Generadas/'.$rucem.'74902020320953.xml', 0777);
        return $rucem.'74902020320953.xml';
    }

    function modulo11(){
        $clave='140420190117914151320012034051000111586412615331';
        $codigo_numerico=date("d").date("G").date("i").date("s");
        $total=0;
        $mod11=0;
        $verificador=0;
        for($i=0;$i<strlen($clave);$i++){
            $total=$total + ($clave[$i]*2);
        }
        $mod11=$total%11;
        $verificador=11-$mod11;
        $acceso=$clave . $verificador;
        $size=strlen($acceso);
        return "total: ".$total. " mod11: ". $mod11." ver: ". $verificador . " acceso: ". $acceso ." size: ". $size. "codigo numerico: ".$codigo_numerico;
    }
}
