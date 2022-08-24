import java.io.*;
import java.net.*;

public class UDPClient {
    public static DatagramSocket clientsocket;
    public static DatagramPacket dp;
    public static BufferedReader br;
    public static InetAddress ia;
    public static byte buf[] = new byte[1024];
    public static int cport = 2222, sport = 4444;

    public static void main(String[] args) throws IOException {
        clientsocket = new DatagramSocket(cport);
        dp = new DatagramPacket(buf, buf.length);
        br = new BufferedReader(new InputStreamReader(System.in));
        ia = InetAddress.getLocalHost();

        System.out.println("Client is Running...");
        System.out.println("Type some text if u want to Quit type 'exit'.");
        while (true) {
            String str1 = new String(br.readLine());
            buf = str1.getBytes();
            if (str1.equals("exit")) {
                System.out.println("Terminated..");
                clientsocket.send(new DatagramPacket(buf, str1.length(), ia, sport));
                break;
            }
            clientsocket.send(new DatagramPacket(buf, str1.length(), ia, sport));

            clientsocket.receive(dp);
            String str4 = new String(dp.getData(), 0, dp.getLength());
            System.out.println("Server said : " + str4);
        }
    }
}