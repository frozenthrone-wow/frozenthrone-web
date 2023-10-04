import './bootstrap';
import './toast';
import { getNews } from './news';
import { getDownloads } from './downloads';

// Restricts input for the set of matched elements to the given inputFilter function.
(function ($) {
	$.fn.inputFilter = function (callback, errMsg) {
		return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function (e) {
			if (callback(this.value)) {
				// Accepted value
				if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
					$(this).removeClass("input-error");
					this.setCustomValidity("");
				}
				this.oldValue = this.value;
				this.oldSelectionStart = this.selectionStart;
				this.oldSelectionEnd = this.selectionEnd;
			} else if (this.hasOwnProperty("oldValue")) {
				// Rejected value - restore the previous one
				$(this).addClass("input-error");
				this.setCustomValidity(errMsg);
				this.reportValidity();
				this.value = this.oldValue;
				this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
			} else {
				// Rejected value - nothing to restore
				this.value = "";
			}
		});
	};
}(jQuery));

getNews();

document.addEventListener('display-news-view', function(e) {
    let postId = e.detail;
    getNews(postId);
});

document.addEventListener('display-downloads-view', function(e) {
    getDownloads();
});
