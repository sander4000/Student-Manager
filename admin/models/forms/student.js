/**
 *	student : Validate
 *	Filename : student.js
 *
 *	Author : Sander Crombeen
 *	Component : Student Manager
 *
 *	Copyright : Copyright (C) 2014. All Rights Reserved
 *	License : GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
 *
 **/
window.addEvent('domready', function() {
	document.formvalidator.setHandler('studentid',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
	document.formvalidator.setHandler('studentname',
		function (value) {
			regex=/^[^_]+$/;
			return regex.test(value);
	});
});