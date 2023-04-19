/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package project.java.desktop_java;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import javax.swing.JOptionPane;


/**
 *
 * @author HP
 */
public class ConnectionDB {
   public static Connection getConnexion(){
        Connection connex = null;
        try {
            
            connex = DriverManager.getConnection("jdbc:mysql://localhost:3306/gl_projet", "root","root");
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(null, "connection failed");
        }

          return  connex;
    }
 }

