import java.io.*;
import java.net.*;
import java.util.Vector;

public class RSSReader {
    public static void main(String[] args) {
        readRSS("http://feeds.bbci.co.uk/news/world/rss.xml");
    }

    public static void readRSS(String urlAddress) {
        String line, tempT, tempL, tempD, tempPD;
        int firstPos, lastPos;
        boolean flag = true;

        Vector<String> title = new Vector<String>();
        Vector<String> description = new Vector<String>();
        Vector<String> link = new Vector<String>();
        Vector<String> pubdate = new Vector<String>();

        try {
            URL rssURL = new URL(urlAddress);
            BufferedReader in = new BufferedReader(new InputStreamReader(rssURL.openStream()));
            while ((line = in.readLine()) != null) {
                if (!(line.contains("<item>")) && flag)
                    continue;
                flag = false;
                if (line.contains("<title>")) {
                    firstPos = line.indexOf("<title>");
                    tempT = line.substring(firstPos);
                    lastPos = tempT.indexOf("</title>");
                    if (line.contains("<title><![CDATA["))
                        tempT = tempT.substring(16, lastPos - 3);
                    else
                        tempT = tempT.substring(7, lastPos);
                    title.add("Title: " + tempT);
                }
                if (line.contains("<description>")) {
                    firstPos = line.indexOf("<description>");
                    tempD = line.substring(firstPos);
                    lastPos = tempD.indexOf("</description>");
                    if (line.contains("<description><![CDATA["))
                        tempD = tempD.substring(22, lastPos - 3);
                    else
                        tempD = tempD.substring(13, lastPos);
                    if (tempD.length() > 30)
                        tempD = tempD.substring(0, 30) + "...";
                    description.add("Description: " + tempD);
                }
                if (line.contains("<link>")) {
                    firstPos = line.indexOf("<link>");
                    tempL = line.substring(firstPos);
                    lastPos = tempL.indexOf("</link>");
                    tempL = tempL.substring(6, lastPos);
                    link.add("Link: " + tempL);
                }
                if (line.contains("<pubDate>")) {
                    firstPos = line.indexOf("<pubDate>");
                    tempPD = line.substring(firstPos);
                    lastPos = tempPD.indexOf("</pubDate>");
                    tempPD = tempPD.substring(9, lastPos);
                    pubdate.add("Publish Date: " + tempPD);
                }
            }
            in.close();
            for (int i = 0; i < title.size(); i++) {
                System.out.println(title.get(i));
                System.out.println(description.get(i));
                System.out.println(link.get(i));
                System.out.println(pubdate.get(i) + "\n");
            }
        } catch (MalformedURLException eM) {
            System.out.println("Bad URL! \n" + eM);
        } catch (IOException eIO) {
            System.out.println(eIO);
        }
    }
}
