package com.example;
import java.io.PrintWriter;

import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class servlettwo extends HttpServlet {
    public void doPost(HttpServletRequest request, HttpServletResponse response) {
		try {

			response.setContentType("text/html");
			PrintWriter out = response.getWriter();

			Cookie[] cookies = request.getCookies();
			out.print("Hello " + cookies[0].getValue());

			out.close();

		} catch (Exception ex) {
			System.out.println(ex);
		}
	}
}
