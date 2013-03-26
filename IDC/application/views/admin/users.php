<div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Users > User List</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
            <ul class="hornav">
                <li class="current"><a href="#updates">Users</a></li>
                <li><a href="#activities">New User</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="updates" class="subcontent">
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb overviewtable2">
                            <colgroup>
                                <col class="con0" style="width: 4%" />
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="head1">No.</th>
                                    <th class="head0">User</th>
									<th class="head0">Role</th>
									<th class="head1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tom</td>
									<td>Billing</td>
									<td align="center"><a href="#">Add another role</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Harry</td>
									<td>IT</td>
									<td align="center"><a href="#">Add another role</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Dick</td>
									<td>Sales</td>
									<td align="center"><a href="#">Add another role</a></td>
                                </tr>
                            </tbody>
                        </table>
                    
                    
            </div><!-- #updates -->
            
            <div id="activities" class="subcontent" style="display:none;">
            	<form class="stdform stdform2" method="post" action="#">
                    	<p>
                        	<label>User</label>
                            <span class="field"><input type="text" name="firstname" id="firstname2" class="longinput" /></span>
                        </p>
						<p>
                        	<label>Select</label>
                            <span class="field">
                            <select name="selection" id="selection">
                            	<option value="">Billing</option>
                                <option value="1">IT</option>
                                <option value="2">Sales</option>
                                <option value="4">Etc.</option>
                            </select>
                            </span>
                        </p>
                        <p class="stdformbutton">
                        	<button class="submit radius2">Submit Button</button>
                            <input type="reset" class="reset radius2" value="Reset Button" />
                        </p>
                    </form>
            </div><!-- #activities -->
        
        </div><!--contentwrapper-->
        
        <br clear="all" />
        
	</div><!-- centercontent -->