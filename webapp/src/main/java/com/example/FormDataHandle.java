package com.example;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

// Servlet implementation class FormDataHandle

// Annotation to map the Servlet URL
@WebServlet("/forms")
public class FormDataHandle extends HttpServlet {
    private static final long serialVersionUID = 1L;

    // Auto-generated constructor stub
    public FormDataHandle() {
        super();
    }

    // HttpServlet doPost(HttpServletRequest request, HttpServletResponse response) method
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        
        // Get the values from the request using 'getParameter'
        String name = request.getParameter("name");
        String phNum = request.getParameter("phone");
        String gender = request.getParameter("gender");
        
        // To get all the values selected for 
        // programming language, use 'getParameterValues'
        String progLang[] = request.getParameterValues("language");
      
        // Iterate through the String array to 
        // store the selected values in form of String
        String langSelect = "";
        if(progLang!=null){
            for(int i=0;i<progLang.length;i++){
                langSelect= langSelect + progLang[i]+ ", ";
            }
        }
        
        String courseDur = request.getParameter("duration");
        String comment = request.getParameter("comment");
                
        // set the content type of response to 'text/html'
        response.setContentType("text/html");
        
        // Get the PrintWriter object to write 
        // the response to the text-output stream
        PrintWriter out = response.getWriter();
        
        // Print the data
        out.print("<html><body>");
        out.print("<h3>Details Entered</h3><br/>");
        
        out.print("Full Name: "+ name + "<br/>");
        out.print("Phone Number: "+ phNum +"<br/>");
        out.print("Gender: "+ gender +"<br/>");
        out.print("Programming languages selected: "+ langSelect +"<br/>");
        out.print("Duration of course: "+ courseDur+"<br/>");
        out.print("Comments: "+ comment);
        
        out.print("</body></html>");
        
    }

}