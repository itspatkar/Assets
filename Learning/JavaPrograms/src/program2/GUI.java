package program2;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class GUI extends JFrame implements ActionListener {
    JButton btnYellow, btnGreen;
    GUI(){
        btnYellow = new JButton("Yellow");
        btnGreen = new JButton("Green");
        add(btnYellow);
        add(btnGreen);
        btnYellow.addActionListener(this);
        btnGreen.addActionListener(this);
        setTitle("Change Frame Color");
        setSize(400,400);
        setLayout(new FlowLayout());
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setResizable(false);
        setVisible(true);
    }
    public void actionPerformed(ActionEvent ae){
        if(ae.getSource()==btnYellow) getContentPane().setBackground(Color.YELLOW);
        if(ae.getSource()==btnGreen) getContentPane().setBackground(Color.GREEN);
    }
    public static void main(String args[]){
        GUI ob = new GUI();
    }
}
