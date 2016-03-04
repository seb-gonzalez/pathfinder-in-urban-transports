
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
 *         &lt;element name="autobus" type="{http://docs.gijon.es/sw/busgijon.asmx}EstadoAutobusBus" minOccurs="0"/>
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
    "autobus"
})
@XmlRootElement(name = "estadoBusResponse")
public class EstadoBusResponse {

    protected EstadoAutobusBus autobus;

    /**
     * Obtiene el valor de la propiedad autobus.
     * 
     * @return
     *     possible object is
     *     {@link EstadoAutobusBus }
     *     
     */
    public EstadoAutobusBus getAutobus() {
        return autobus;
    }

    /**
     * Define el valor de la propiedad autobus.
     * 
     * @param value
     *     allowed object is
     *     {@link EstadoAutobusBus }
     *     
     */
    public void setAutobus(EstadoAutobusBus value) {
        this.autobus = value;
    }

}
