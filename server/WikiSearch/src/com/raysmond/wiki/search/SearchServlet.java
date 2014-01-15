package com.raysmond.wiki.search;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.lucene.queryparser.classic.ParseException;
import org.json.JSONObject;

import com.junshiguo.wiki.lucene.WikiSearch;

/**
 * WikiSearch controller
 * 
 * @author Raysmond
 * @created: 2013-12-27
 */
@WebServlet("/SearchServlet")
public class SearchServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	private static final String INDEX_PATH = "/Users/Raysmond/Documents/Projects/Java/EnWikiIndexing/full_index";
	private static final String TITLE_PATH = "/Users/Raysmond/Documents/Projects/Java/EnWikiIndexing/full_index_title";
	
	public SearchServlet() {
		super();
	}

	protected void doGet(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		doSearch(request, response);
	}

	protected void doPost(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		doSearch(request, response);
	}

	private void doSearch(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/json");
		response.setCharacterEncoding("utf8");
		String query = request.getParameter("query");
		if (null != query && !query.isEmpty()) {
			int page = 1;
			try {
				page = Integer.parseInt(request.getParameter("page"));
			} catch (NumberFormatException e) {
				page = 1;
			}
			WikiSearch searcher = new WikiSearch();
			searcher.setWIWIndexPath(INDEX_PATH);
			searcher.setITIndexPath(TITLE_PATH);
			searcher.setSearchString(query.trim().toLowerCase());
			PrintWriter writer = response.getWriter();
			try {
				JSONObject result = searcher.doSearch();
				writer.print(result.toString());
			} catch (ParseException e) {
				response.getWriter().print("{\"error\":\"true\"}");
			}
			writer.flush();
		}
	}

}
