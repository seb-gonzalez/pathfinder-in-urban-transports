
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
 *         &lt;element name="psIdParada" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
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
    "psIdParada"
})
@XmlRootElement(name = "infoParadas")
public class InfoParadas {

    protected String psIdParada;

    /**
     * Obtiene el valor de la propiedad psIdParada.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getPsIdParada() {
        return psIdParada;
    }

    /**
     * Define el valor de la propiedad psIdParada.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setPsIdParada(String value) {
        this.psIdParada = value;
    }

}
