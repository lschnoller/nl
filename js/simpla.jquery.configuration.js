$(document).ready(function(){
	
	//Sidebar Accordion Menu:
		
		$("#main-nav li ul").hide(); // Hide all sub menus
		$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
		
		$("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
				$(this).next().slideToggle("normal"); // Slide down the clicked sub menu
				return false;
			}
		);
		
		$("#main-nav li a.no-submenu").click( // When a menu item with no sub menu is clicked...
			function () {
				window.location.href=(this.href); // Just open the link instead of a sub menu
				return false;
			}
		); 

    // Sidebar Accordion Menu Hover Effect:
		
		$("#main-nav li .nav-top-item").hover(
			function () {
				$(this).stop().animate({ paddingRight: "25px" }, 200);
			}, 
			function () {
				$(this).stop().animate({ paddingRight: "15px" });
			}
		);

    //Minimize Content Box
		
		$(".content-box-header h3").css({ "cursor":"s-resize" }); // Give the h3 in Content Box Header a different cursor
		$(".closed-box .content-box-content").hide(); // Hide the content of the header if it has the class "closed"
		$(".closed-box .content-box-tabs").hide(); // Hide the tabs in the header if it has the class "closed"
		
		$(".content-box-header h3").click( // When the h3 is clicked...
			function () {
			  $(this).parent().next().toggle(); // Toggle the Content Box
			  $(this).parent().parent().toggleClass("closed-box"); // Toggle the class "closed-box" on the content box
			  $(this).parent().find(".content-box-tabs").toggle(); // Toggle the tabs
			}
		);

    // Content box tabs:
		
		$('.content-box .content-box-content div.tab-content').hide(); // Hide the content divs
		$('ul.content-box-tabs li a.default-tab').addClass('current'); // Add the class "current" to the default tab
		$('.content-box-content div.default-tab').show(); // Show the div with class "default-tab"
		
		/*
		$('.content-box ul.content-box-tabs li a').click( // When a tab is clicked...
			function() { 
				$(this).parent().siblings().find("a").removeClass('current'); // Remove "current" class from all tabs
				$(this).addClass('current'); // Add class "current" to clicked tab
				var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
				$(currentTab).siblings().hide(); // Hide all content divs
				$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
				return false; 
			}
		);*/
		
		/*$('a.edit').click( // When a edit button is clicked...
			function() { 
				$('.content-box-content').siblings().find("a").removeClass('current'); 
				$('#addedit-tab').addClass('current'); 
				var loadURL = $(this).attr('href');
				loadURL = loadURL.replace('#','');
				$('#addedit').load(loadURL);
				var currentTab = $('#addedit-tab').attr('href');
				$(currentTab).siblings().hide(); 
				$(currentTab).show();
				return false; 
			}
		);*/
		
		$('a.delete').click( // When a delete button is clicked...
				function() { 
					me=this;
					var deleteURL = $(this).attr('href');
					deleteURL = deleteURL.replace('#','');
					var id = $(this).attr('id');
					tr = $(me).parent().parent();
					tr.addClass('tr'+id);
					$('.tr'+id).append('<td colspan="10" style="display: none;" class="listing-notification-td'+id+'"><div id="listing-notification'+id+'" class="listing-notification attention png_bg"><div>Do you really want to delete this record? <input class="button" type="button" id="letsdelete'+id+'" value="DELETE" style="margin-left: 20px;"/><input style="margin-left: 20px;" class="button" id="dontdelete'+id+'" type="button" value="NO" /></div></div></td>');
					$('.tr'+id).find("td").hide();
					$('.listing-notification-td'+id).fadeIn();	
					$('#dontdelete'+id).click(function() {
						$('.tr'+id).find("td").show();
						$('.listing-notification-td'+id).remove();
						
					});
					$('#letsdelete'+id).click(function() {
						$.ajax({
							  url: deleteURL,
							  dataType: 'text',
							  success: function(data) {
								if(data == 'yes'){
									$('#listing-notification'+id).addClass('success').removeClass('attention');
								    $('#listing-notification'+id).html('<a href="#" id="close'+id+'" class="close"></a><div>Record has been deleted</div>');
								    $("#close"+id).click(
											function () {
												$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
													$(this).slideUp(400);
												});
												$('.tr'+id).remove();
												$('tbody tr').removeClass("alt-row");
												$('tbody tr:even').addClass("alt-row");
												return false;
											}
									);
								}else{
									$('#listing-notification'+id).addClass('error').removeClass('attention');
								    $('#listing-notification'+id).html('<a href="#" id="close'+id+'" class="close"></a><div>Error: '+data.text+'</div>');
								    $("#close"+id).click(
											function () {
												$('.listing-notification-td'+id).remove();
												$('.tr'+id).find("td").show();
												return false;
											}
									);
								}
							    
							  },
							  error: function(data) {
								    $('#listing-notification'+id).addClass('error').removeClass('attention');
								    $('#listing-notification'+id).html('<a href="#" id="close'+id+'" class="close"></a><div>An Error Occurred</div>');
								    $("#close"+id).click(
											function () {
												$('.listing-notification-td'+id).remove();
												$('.tr'+id).find("td").show();
												return false;
											}
										);
							  }
							});
						
					});
				}
		);
		
		/////// Status Button 
		$('a.status').click( // When a delete button is clicked...
				function() { 
					me=this;
					var URL = $(this).attr('href');
					URL = URL.replace('#','');
					var id = $(this).attr('id');
					$.ajax({
						  url: URL,
						  success: function(data) {
							$('#img'+id).attr("src", function() { 
								if(this.src.indexOf("_1")>0)
									return this.src.replace("_1","_0");
								else
									return this.src.replace("_0","_1");
						    });

						}
					});
				});
		$(".status img").hover(
				 function()
				 {
					this.src = this.src.replace("status","over");
				 },
				 function()
				 {
					this.src = this.src.replace("over","status");
				 }
				);

    //Close button:
		
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(400);
				});
				return false;
			}
		);
		$(".close-alone").click(
				function () {
					$(this).parent().hide('slow');
					return false;
				}
			);
		
		
    // Alternating table rows:
		
		$('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows

    // Check all checkboxes when the one in a table head is checked:
		
		$('.check-all').click(
			function(){
				$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
			}
		);

    // Initialise Facebox Modal window:
		$(document).ready(function() {
			$('a[rel*=modal]').facebox(); // Applies modal window to any link with attribute rel="modal"
		});
		jQuery(document).ready(function($) {
			  $('a[rel*=facebox]').facebox()
		});
    // Initialise jQuery WYSIWYG:
		
		$(".wysiwyg").wysiwyg(); // Applies WYSIWYG editor to any textarea with the class "wysiwyg"

});
  
 

	function aDelete(me) { 
			var deleteURL = $(me).attr('href');
			deleteURL = deleteURL.replace('#','');
			var id = $(me).attr('id');
			tr = $(me).parent().parent();
			tr.addClass('tr'+id);
			$('.tr'+id).append('<td colspan="10" style="display: none;" class="listing-notification-td'+id+'"><div id="listing-notification'+id+'" class="listing-notification attention png_bg"><div>Do you really want to delete this record? <input class="button" type="button" id="letsdelete'+id+'" value="DELETE" style="margin-left: 20px;"/><input style="margin-left: 20px;" class="button" id="dontdelete'+id+'" type="button" value="NO" /></div></div></td>');
			$('.tr'+id).find("td").hide();
			$('.listing-notification-td'+id).fadeIn();	
			$('#dontdelete'+id).click(function() {
				$('.tr'+id).find("td").show();
				$('.listing-notification-td'+id).remove();
				
			});
			$('#letsdelete'+id).click(function() {
				$.ajax({
					  url: deleteURL,
					  dataType: 'json',
					  success: function(data) {
						if(data.stat){
							$('#listing-notification'+id).addClass('success').removeClass('attention');
						    $('#listing-notification'+id).html('<a href="#" id="close'+id+'" class="close"></a><div>Record has been deleted</div>');
						    $("#close"+id).click(
									function () {
										$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
											$(this).slideUp(400);
										});
										$('.tr'+id).remove();
										$('tbody tr').removeClass("alt-row");
										$('tbody tr:even').addClass("alt-row");
										return false;
									}
							);
						}else{
							$('#listing-notification'+id).addClass('error').removeClass('attention');
						    $('#listing-notification'+id).html('<a href="#" id="close'+id+'" class="close"></a><div>Error: '+data.text+'</div>');
						    $("#close"+id).click(
									function () {
										$('.listing-notification-td'+id).remove();
										$('.tr'+id).find("td").show();
										return false;
									}
							);
						}
					    
					  },
					  error: function(data) {
						    $('#listing-notification'+id).addClass('error').removeClass('attention');
						    $('#listing-notification'+id).html('<a href="#" id="close'+id+'" class="close"></a><div>An Error Occurred</div>');
						    $("#close"+id).click(
									function () {
										$('.listing-notification-td'+id).remove();
										$('.tr'+id).find("td").show();
										return false;
									}
								);
					  }
					});
				
			});
		}
  