require 'test_helper'

class ExppageControllerTest < ActionDispatch::IntegrationTest
  test "should get exp" do
    get exppage_exp_url
    assert_response :success
  end

end
