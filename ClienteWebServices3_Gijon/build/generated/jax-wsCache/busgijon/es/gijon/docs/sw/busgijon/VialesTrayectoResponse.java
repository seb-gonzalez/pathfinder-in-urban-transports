
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para anonymous complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType>
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="vialestrayectolinea" type="{http://docs.gijon.es/sw/busgijon.asmx}VialesTrayectoBus" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "", propOrder = {
    "vialestrayectolinea"
})
@XmlRootElement(name = "vialesTrayectoResponse")
public class VialesTrayectoResponse {

    protected VialesTrayectoBus vialestrayectolinea;

    /**
     * Obtiene el valor de la propiedad vialestrayectolinea.
     * 
     * @return
     *     possible object is
     *     {@link VialesTrayectoBus }
     *     
     */
    public VialesTrayectoBus getVialestrayectolinea() {
        return vialestrayectolinea;
    }

    /**
     * Define el valor de la propiedad vialestrayectolinea.
     * 
     * @param value
     *     allowed object is
     *     {@link VialesTrayectoBus }
     *     
     */
    public void setVialestrayectolinea(VialesTrayectoBus value) {
        this.vialestrayectolinea = value;
    }

}
