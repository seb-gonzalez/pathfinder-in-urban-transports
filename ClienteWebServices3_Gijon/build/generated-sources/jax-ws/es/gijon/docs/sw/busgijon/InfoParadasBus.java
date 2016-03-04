
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para InfoParadasBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="InfoParadasBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="infos" type="{http://docs.gijon.es/sw/busgijon.asmx}ArrayOfInfoParada" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "InfoParadasBus", propOrder = {
    "infos"
})
public class InfoParadasBus {

    protected ArrayOfInfoParada infos;

    /**
     * Obtiene el valor de la propiedad infos.
     * 
     * @return
     *     possible object is
     *     {@link ArrayOfInfoParada }
     *     
     */
    public ArrayOfInfoParada getInfos() {
        return infos;
    }

    /**
     * Define el valor de la propiedad infos.
     * 
     * @param value
     *     allowed object is
     *     {@link ArrayOfInfoParada }
     *     
     */
    public void setInfos(ArrayOfInfoParada value) {
        this.infos = value;
    }

}
