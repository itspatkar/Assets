import java.io.*;
import java.net.*;
import java.util.Vector;

public class RSS {
    public static void main(String[] args) {
        readRSS("http://feeds.bbci.co.uk/news/world/rss.xml");
    }

    public static void readRSS(String urlAddress) {
        String line, temp_t, temp_d, temp_l, temp_pd;
        int first_pos, last_pos;
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
                    first_pos = line.indexOf("<title>");
                    temp_t = line.substring(first_pos);
                    last_pos = temp_t.indexOf("</title>");
                    if (line.contains("<title><![CDATA["))
                        temp_t = temp_t.substring(16, last_pos - 3);
                    else
                        temp_t = temp_t.substring(7, last_pos);
                    title.add("Title: " + temp_t);
                }
                if (line.contains("<description>")) {
                    first_pos = line.indexOf("<description>");
                    temp_d = line.substring(first_pos);
                    last_pos = temp_d.indexOf("</description>");
                    if (line.contains("<description><![CDATA["))
                        temp_d = temp_d.substring(22, last_pos - 3);
                    else
                        temp_d = temp_d.substring(13, last_pos);
                    if (temp_d.length() > 30)
                        temp_d = temp_d.substring(0, 30) + "...";
                    description.add("Description: " + temp_d);
                }
                if (line.contains("<link>")) {
                    first_pos = line.indexOf("<link>");
                    temp_l = line.substring(first_pos);
                    last_pos = temp_l.indexOf("</link>");
                    temp_l = temp_l.substring(6, last_pos);
                    link.add("Link: " + temp_l);
                }
                if (line.contains("<pubDate>")) {
                    first_pos = line.indexOf("<pubDate>");
                    temp_pd = line.substring(first_pos);
                    last_pos = temp_pd.indexOf("</pubDate>");
                    temp_pd = temp_pd.substring(9, last_pos);
                    pubdate.add("Publish Date: " + temp_pd);
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
