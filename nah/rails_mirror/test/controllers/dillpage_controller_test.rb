require 'test_helper'

class DillpageControllerTest < ActionDispatch::IntegrationTest
  test "should get dill" do
    get dillpage_dill_url
    assert_response :success
  end

end
