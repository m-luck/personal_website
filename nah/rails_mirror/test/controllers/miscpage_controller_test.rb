require 'test_helper'

class MiscpageControllerTest < ActionDispatch::IntegrationTest
  test "should get misc" do
    get miscpage_misc_url
    assert_response :success
  end

end
