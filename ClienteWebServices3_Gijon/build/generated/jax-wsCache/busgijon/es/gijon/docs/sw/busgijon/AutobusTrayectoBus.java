
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para AutobusTrayectoBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="AutobusTrayectoBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="idautobus" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="paradas" type="{http://docs.gijon.es/sw/busgijon.asmx}ArrayOfParadaAutobusTrayectoBus" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "AutobusTrayectoBus", propOrder = {
    "idautobus",
    "paradas"
})
public class AutobusTrayectoBus {

    protected String idautobus;
    protected ArrayOfParadaAutobusTrayectoBus paradas;

    /**
     * Obtiene el valor de la propiedad idautobus.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getIdautobus() {
        return idautobus;
    }

    /**
     * Define el valor de la propiedad idautobus.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setIdautobus(String value) {
        this.idautobus = value;
    }

    /**
     * Obtiene el valor de la propiedad paradas.
     * 
     * @return
     *     possible object is
     *     {@link ArrayOfParadaAutobusTrayectoBus }
     *     
     */
    public ArrayOfParadaAutobusTrayectoBus getParadas() {
        return paradas;
    }

    /**
     * Define el valor de la propiedad paradas.
     * 
     * @param value
     *     allowed object is
     *     {@link ArrayOfParadaAutobusTrayectoBus }
     *     
     */
    public void setParadas(ArrayOfParadaAutobusTrayectoBus value) {
        this.paradas = value;
    }

}
