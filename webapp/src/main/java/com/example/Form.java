package com.example;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

@WebServlet("/mylogin")
public class Form  extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {

        String email =  req.getParameter("name1");
        String password=   req.getParameter("pass");


         resp.setContentType("text/html");
        PrintWriter out = resp.getWriter();

        if (email.equals("ashwin123@gmail.com") && password.equals("hari")) {
            out.println("<h2>Login Successful</h2>");
        } else {
            out.println("<h2>Login Failed</h2>");
        }

    }
}