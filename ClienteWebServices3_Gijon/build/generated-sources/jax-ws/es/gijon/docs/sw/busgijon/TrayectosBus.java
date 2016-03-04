
package es.gijon.docs.sw.busgijon;

import java.util.ArrayList;
import java.util.List;
import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para TrayectosBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="TrayectosBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="trayecto" type="{http://docs.gijon.es/sw/busgijon.asmx}TrayectoBus" maxOccurs="unbounded" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "TrayectosBus", propOrder = {
    "trayecto"
})
public class TrayectosBus {

    protected List<TrayectoBus> trayecto;

    /**
     * Gets the value of the trayecto property.
     * 
     * <p>
     * This accessor method returns a reference to the live list,
     * not a snapshot. Therefore any modification you make to the
     * returned list will be present inside the JAXB object.
     * This is why there is not a <CODE>set</CODE> method for the trayecto property.
     * 
     * <p>
     * For example, to add a new item, do as follows:
     * <pre>
     *    getTrayecto().add(newItem);
     * </pre>
     * 
     * 
     * <p>
     * Objects of the following type(s) are allowed in the list
     * {@link TrayectoBus }
     * 
     * 
     */
    public List<TrayectoBus> getTrayecto() {
        if (trayecto == null) {
            trayecto = new ArrayList<TrayectoBus>();
        }
        return this.trayecto;
    }

}
