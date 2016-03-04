
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
 *         &lt;element name="paradas" type="{http://docs.gijon.es/sw/busgijon.asmx}ParadasBus" minOccurs="0"/>
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
    "paradas"
})
@XmlRootElement(name = "ParadasResponse")
public class ParadasResponse {

    protected ParadasBus paradas;

    /**
     * Obtiene el valor de la propiedad paradas.
     * 
     * @return
     *     possible object is
     *     {@link ParadasBus }
     *     
     */
    public ParadasBus getParadas() {
        return paradas;
    }

    /**
     * Define el valor de la propiedad paradas.
     * 
     * @param value
     *     allowed object is
     *     {@link ParadasBus }
     *     
     */
    public void setParadas(ParadasBus value) {
        this.paradas = value;
    }

}
