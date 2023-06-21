package com.experiment13;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class gui
{
    static JFrame fr;
    static JPanel pn;
    static JRadioButton rb1,rb2;
    static JLabel lb1,lb2,lb3;
    static JButton sb1;
    static JTextField name;
    static JPasswordField pr;
    static ButtonGroup gp;

    public static void main(String[] args)
    {
        go();

    }
    public static void go()
    {
        fr=new JFrame();
        fr.setSize(450,350);
        fr.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        fr.setVisible(true);

        pn=new JPanel();
        fr.add(pn);
        pn.setLayout(null);

        lb3=new JLabel("Welcome");
        lb3.setBounds(50,20,125,25);
        pn.add(lb3);

        lb1=new JLabel("Name");
        lb1.setBounds(10,50,85,25);
        pn.add(lb1);

        name=new JTextField();
        name.setBounds(100,50,165,25);
        pn.add(name);

        lb2=new JLabel("");
        lb2.setBounds(50,150,185,25);
        pn.add(lb2);
        lb2.setVisible(false);

        rb1=new JRadioButton("Male");
        rb1.setBounds(40,80,85,25);
        pn.add(rb1);

        rb2=new JRadioButton("Female");
        rb2.setBounds(140,80,85,25);
        pn.add(rb2);

        gp= new ButtonGroup();
        gp.add(rb1);
        gp.add(rb2);

        sb1=new JButton("Submit");
        sb1.setBounds(50,120,125,25);
        sb1.addActionListener(new Gui());
        pn.add(sb1);
    }

    private static class Gui implements ActionListener
    {
        @Override
        public void actionPerformed(ActionEvent e)
        {
            lb2.setVisible(true);
            String x;
            x=name.getText();
            if(rb1.isSelected())
            {

                lb2.setText("Hello, Mr. "+x);
            }
            else
            {
                lb2.setText("Hello, Miss. "+x);
            }
        }
    }
}