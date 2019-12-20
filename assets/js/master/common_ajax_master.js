/* Load State Master Data Start Here */
function refresh_state_master_details()
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-state-master-details",
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load State Master Data End Here  */

/* Load District Master Data Start Here */
function refresh_district_master_details(state_id)
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-district-master-details",
              data: {state_id: state_id},
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load District Master Data End Here  */

/* Load City Master Data Start Here */
function refresh_city_master_details(state_id,district_id)
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-city-master-details",
              data: {state_id:state_id,district_id: district_id},
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load City Master Data End Here  */

/* Load City Master Data Start Here */
function refresh_location_type_master_details()
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-location-type-master-details",
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load City Master Data End Here  */
/* Load Bank Master Data Start Here */
function refresh_bank_master_details()
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-bank-master-details",
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load Bank Master Data End Here  */
/* Load Department Master Data Start Here */
function refresh_department_master_details()
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-department-master-details",
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load Department Master Data End Here  */

/* Load Address Type Master Data Start Here */
function refresh_address_type_master_details()
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-address-type-master-details",
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load Address Type Master Data End Here  */

/* Load Bank Branch Master Data Start Here */
function refresh_bank_branch_master_details(bank_id)
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-bank-branch-master-details",
              data:{'bank_id' :bank_id},
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load Bank Branch Master Data End Here  */

/* Load Accounts Type Master Data Start Here */
function refresh_accounts_type_master_details()
{
  var result="";
  $.ajax({
              type: "post",
              url: APP_URL +"/common-master-details/get-accounts-type-master-details",
              async: false,
              success: function (res)
              {
                result=res;
              }
          });
          return result;
}
/* Load Bank Branch Master Data End Here  */

