
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
 *         &lt;element name="llegadas" type="{http://docs.gijon.es/sw/busgijon.asmx}LlegadasBus" minOccurs="0"/>
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
    "llegadas"
})
@XmlRootElement(name = "LlegadasParadasResponse")
public class LlegadasParadasResponse {

    protected LlegadasBus llegadas;

    /**
     * Obtiene el valor de la propiedad llegadas.
     * 
     * @return
     *     possible object is
     *     {@link LlegadasBus }
     *     
     */
    public LlegadasBus getLlegadas() {
        return llegadas;
    }

    /**
     * Define el valor de la propiedad llegadas.
     * 
     * @param value
     *     allowed object is
     *     {@link LlegadasBus }
     *     
     */
    public void setLlegadas(LlegadasBus value) {
        this.llegadas = value;
    }

}
