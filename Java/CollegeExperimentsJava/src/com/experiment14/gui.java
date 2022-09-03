package com.experiment14;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Arrays;

class LoginPage extends JFrame implements ActionListener {
    JLabel u,p;
    JTextField t;
    JPasswordField pass;
    JButton b;

    public LoginPage(){
        u = new JLabel("Username");
        p = new JLabel("Password");
        t = new JTextField(16);
        pass = new JPasswordField(16);
        b = new JButton("verify");

        b.addActionListener(this);

        add(u);
        add(t);
        add(p);
        add(pass);
        add(b);

        setLayout(new FlowLayout());
        setVisible(true);
        setTitle("Login Page");
        setSize(500,500);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    }
    public void actionPerformed(ActionEvent ae){
        String name = t.getText();
        String correctName = "sea";
        char[] pw = pass.getPassword();
        char[] correctPw = new char[] {'s','i','l','e','n','t'};

        if(name.equals(correctName) && Arrays.equals(pw,correctPw)){
            JOptionPane.showConfirmDialog(this,"Success");
        } else {
            JOptionPane.showConfirmDialog(this,"Incorrect Password");
        }
    }
}

public class gui {
    public static void main(String[] args){
        LoginPage ob = new LoginPage();
    }
}
