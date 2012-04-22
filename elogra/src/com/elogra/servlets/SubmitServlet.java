
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
import com.elogra.model.SubmitModel;
import com.elogra.util.Search;
import com.elogra.util.Submit;

/**
 * Servlet implementation class Search
 */
@WebServlet("/Submit")
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
		String srcID = request.getParameter("fromHS");
		String destID = request.getParameter("toHS");
		String taxiColor = request.getParameter("RadioGroup1");
		String fare = request.getParameter("fare");
		String fromAddr = request.getParameter("fromAddr");
		String toAddr = request.getParameter("toAddr");
		String when = request.getParameter("when");
		String comment = request.getParameter("comment");
		String traffic = request.getParameter("traffic");
		
		SubmitModel sm = new SubmitModel();
		sm.setCmnt(comment);
		sm.setDestAddr(toAddr);
		sm.setDestID(destID);
		sm.setFare(fare);
		sm.setSrcAddr(fromAddr);
		sm.setSrcID(srcID);
		sm.setTaxiType(taxiColor);
		sm.setTrafficStat(traffic);
		sm.setUserID("0");
		
		Submit s = new Submit();
		s.insertEntry(sm);
		
        //request.setAttribute("searchResult",res);
        request.getRequestDispatcher("submit.tiles").forward(request, response);
//        response.sendRedirect("results.tiles");
//        RequestDispatcher requestDispatcher = getServletContext().getRequestDispatcher("/results.tiles");
//        requestDispatcher.include(request,response);
	}

}
