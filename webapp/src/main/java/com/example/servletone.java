package com.example;
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class servletone extends HttpServlet{
    public void doPost(HttpServletRequest request, HttpServletResponse response) {
		try {

			response.setContentType("text/html");
			PrintWriter out = response.getWriter();

			String userName = request.getParameter("userName");
			out.print("Welcome " + userName);

			Cookie ck = new Cookie("uname", userName);
			response.addCookie(ck); // adding cookie in the response

			RequestDispatcher rd = request.getRequestDispatcher("servletTwo");
			rd.forward(request, response);

			out.close();

		} catch (Exception e) {
			System.out.println(e);
		}
	}
    
}
