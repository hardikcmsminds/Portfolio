/* Theme Name:iDea - Clean & Powerful Bootstrap Theme
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version: 1.2.1
 * Created:October 2014
 * License URI:http://support.wrapbootstrap.com/
 * File Description: Place here your custom scripts
 */

  $(document).ready(function() {
     $("#footer-col").toggle("slow");
   });
    $("#more-link .button").click(function() {
     $("#footer-col").toggle("slow");
  $("#more-link").toggleClass("active");
     $('html,body').animate({
       scrollTop: $("#more-link").offset().top},'slow');
   });