
package es.gijon.docs.sw.busgijon;

import java.util.ArrayList;
import java.util.List;
import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para EstadoParadaBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="EstadoParadaBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="autobus" type="{http://docs.gijon.es/sw/busgijon.asmx}AutobusBus" maxOccurs="unbounded" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "EstadoParadaBus", propOrder = {
    "autobus"
})
public class EstadoParadaBus {

    protected List<AutobusBus> autobus;

    /**
     * Gets the value of the autobus property.
     * 
     * <p>
     * This accessor method returns a reference to the live list,
     * not a snapshot. Therefore any modification you make to the
     * returned list will be present inside the JAXB object.
     * This is why there is not a <CODE>set</CODE> method for the autobus property.
     * 
     * <p>
     * For example, to add a new item, do as follows:
     * <pre>
     *    getAutobus().add(newItem);
     * </pre>
     * 
     * 
     * <p>
     * Objects of the following type(s) are allowed in the list
     * {@link AutobusBus }
     * 
     * 
     */
    public List<AutobusBus> getAutobus() {
        if (autobus == null) {
            autobus = new ArrayList<AutobusBus>();
        }
        return this.autobus;
    }

}
