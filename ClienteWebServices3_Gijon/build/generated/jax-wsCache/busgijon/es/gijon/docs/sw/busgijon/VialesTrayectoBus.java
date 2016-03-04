
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para VialesTrayectoBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="VialesTrayectoBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="linea" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="trayecto" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="ruta" type="{http://docs.gijon.es/sw/busgijon.asmx}ArrayOfCoordenada" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "VialesTrayectoBus", propOrder = {
    "linea",
    "trayecto",
    "ruta"
})
public class VialesTrayectoBus {

    protected int linea;
    protected int trayecto;
    protected ArrayOfCoordenada ruta;

    /**
     * Obtiene el valor de la propiedad linea.
     * 
     */
    public int getLinea() {
        return linea;
    }

    /**
     * Define el valor de la propiedad linea.
     * 
     */
    public void setLinea(int value) {
        this.linea = value;
    }

    /**
     * Obtiene el valor de la propiedad trayecto.
     * 
     */
    public int getTrayecto() {
        return trayecto;
    }

    /**
     * Define el valor de la propiedad trayecto.
     * 
     */
    public void setTrayecto(int value) {
        this.trayecto = value;
    }

    /**
     * Obtiene el valor de la propiedad ruta.
     * 
     * @return
     *     possible object is
     *     {@link ArrayOfCoordenada }
     *     
     */
    public ArrayOfCoordenada getRuta() {
        return ruta;
    }

    /**
     * Define el valor de la propiedad ruta.
     * 
     * @param value
     *     allowed object is
     *     {@link ArrayOfCoordenada }
     *     
     */
    public void setRuta(ArrayOfCoordenada value) {
        this.ruta = value;
    }

}
