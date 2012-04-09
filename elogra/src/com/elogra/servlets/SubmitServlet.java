
package com.elogra.servlets;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.elogra.db.DBConnection;
import com.elogra.model.Result;
import com.elogra.util.Search;

/**
 * Servlet implementation class Search
 */
@WebServlet("//submit")
public class SubmitServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;

    /**
     * Default constructor. 
     */
    public SubmitServlet() {
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		
		System.out.println(request.getParameter("RadioGroup1"));
		
		String srcID = request.getParameter("fromHS");
		String destID = request.getParameter("toHS");
		String taxiColor = request.getParameter("RadioGroup1");
		
		Search s = new Search();
		Result res = s.goSearch(srcID, destID, taxiColor);
        request.setAttribute("searchResult",res);
        request.getRequestDispatcher("results.tiles").forward(request, response);
//        response.sendRedirect("results.tiles");
//        RequestDispatcher requestDispatcher = getServletContext().getRequestDispatcher("/results.tiles");
//        requestDispatcher.include(request,response);
	}

}
