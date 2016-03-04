
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
 *         &lt;element name="infoparadas" type="{http://docs.gijon.es/sw/busgijon.asmx}InfoParadasBus" minOccurs="0"/>
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
    "infoparadas"
})
@XmlRootElement(name = "infoParadasResponse")
public class InfoParadasResponse {

    protected InfoParadasBus infoparadas;

    /**
     * Obtiene el valor de la propiedad infoparadas.
     * 
     * @return
     *     possible object is
     *     {@link InfoParadasBus }
     *     
     */
    public InfoParadasBus getInfoparadas() {
        return infoparadas;
    }

    /**
     * Define el valor de la propiedad infoparadas.
     * 
     * @param value
     *     allowed object is
     *     {@link InfoParadasBus }
     *     
     */
    public void setInfoparadas(InfoParadasBus value) {
        this.infoparadas = value;
    }

}
