package com.elogra.servlets;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.elogra.model.HakawyModel;
import com.elogra.util.Hakawy;

/**
 * Servlet implementation class HakawyServlet
 */
@WebServlet("/HakawyServlet")
public class HakawyServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public HakawyServlet() {
        super();
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
		String hekaya = request.getParameter("taxiTalksInput");
		HakawyModel hm = new HakawyModel();
		Hakawy h = new Hakawy();
		hm.setHekaya(hekaya);
		h.submitHakawy(hm);
	}

}
