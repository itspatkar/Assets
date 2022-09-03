import java.io.*;
import java.net.*;

public class UDPServer {
    public static DatagramSocket serversocket;
    public static DatagramPacket dp;
    public static BufferedReader br;
    public static InetAddress ia;
    public static byte buf[] = new byte[1024];
    public static int cport = 2222, sport = 4444;

    public static void main(String[] args) throws IOException {
        serversocket = new DatagramSocket(sport);
        dp = new DatagramPacket(buf, buf.length);
        br = new BufferedReader(new InputStreamReader(System.in));
        ia = InetAddress.getLocalHost();

        System.out.println("Server is Running...");
        while (true) {
            serversocket.receive(dp);
            String str2 = new String(dp.getData(), 0, dp.getLength());
            if (str2.equals("exit")) {
                System.out.println("Terminated...");
                break;
            }
            System.out.println("Client said : " + str2);

            String str3 = new String(br.readLine());
            buf = str3.getBytes();
            serversocket.send(new DatagramPacket(buf, str3.length(), ia, cport));
        }
    }
}