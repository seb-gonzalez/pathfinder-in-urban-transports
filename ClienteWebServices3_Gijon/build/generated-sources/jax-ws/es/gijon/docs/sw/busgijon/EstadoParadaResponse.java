
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
 *         &lt;element name="autobuses" type="{http://docs.gijon.es/sw/busgijon.asmx}EstadoParadaBus" minOccurs="0"/>
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
    "autobuses"
})
@XmlRootElement(name = "estadoParadaResponse")
public class EstadoParadaResponse {

    protected EstadoParadaBus autobuses;

    /**
     * Obtiene el valor de la propiedad autobuses.
     * 
     * @return
     *     possible object is
     *     {@link EstadoParadaBus }
     *     
     */
    public EstadoParadaBus getAutobuses() {
        return autobuses;
    }

    /**
     * Define el valor de la propiedad autobuses.
     * 
     * @param value
     *     allowed object is
     *     {@link EstadoParadaBus }
     *     
     */
    public void setAutobuses(EstadoParadaBus value) {
        this.autobuses = value;
    }

}
