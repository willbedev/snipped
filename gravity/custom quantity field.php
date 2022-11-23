function customQuantity() {
        /** Custom Input number increment js **/
        jQuery(
            '<div class="pt_QuantityNav"><div class="pt_QuantityButton pt_QuantityUp"><div>+</div></div></div>'
        ).insertAfter(".ginput_container.ginput_container_number input");
        jQuery(".ginput_container.ginput_container_number").each(function () {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find(".pt_QuantityUp"),
                max = input.attr("max"),
                step = 1;

            if ($(spinner).parent().hasClass('step')) {
                step = $(spinner).parent().attr('class');
                step = step.split(' ')
                step.forEach(element => {
                    if (element.startsWith("sfr")) {
                        step = element.replace("sfr", "");
                    }
                });
            };
            btnUp.on("click", function () {
                var oldValue = parseFloat(input.val());

                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + parseInt(step);
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });
        });
        jQuery(
            '<div class="pt_QuantityNav"><div class="pt_QuantityButton pt_QuantityDown"><div>-</div></div></div>'
        ).insertBefore(".ginput_container.ginput_container_number input");
        jQuery(".ginput_container.ginput_container_number").each(function () {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnDown = spinner.find(".pt_QuantityDown"),
                min = input.attr("min"),
                step = 1;

            if ($(spinner).parent().hasClass('step')) {
                step = $(spinner).parent().attr('class');
                step = step.split(' ')
                step.forEach(element => {
                    if (element.startsWith("sfr")) {
                        step = element.replace("sfr", "");
                    }
                });
            };
            btnDown.on("click", function () {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - parseInt(step);
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });
        });
    }