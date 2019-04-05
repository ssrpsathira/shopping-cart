/**
 * Add the given product into cart by calling particular action.php
 *
 * @param productName
 */
function addProductToCart(productName) {
    ajaxPost('addProductToCart.php', {product: productName});
}

/**
 * Remove the given product into cart by calling particular action.php
 *
 * @param productName
 */
function removeProductFromCart(productName) {
    ajaxPost('removeProductFromCart.php', {product: productName});
}

/**
 * Make post ajax request to the back end
 *
 * @param phpAction
 * @param requestData
 */
function ajaxPost(phpAction, requestData = {}) {
    $.ajax({
        url: phpAction,
        type: 'POST',
        data: requestData,
        success: function (response) {
            location.reload();
        },
        statusCode: {
            500: function() {
                alert("An error occurred, please try again");
            }
        }
    });
}