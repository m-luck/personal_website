require 'test_helper'

class AboutpageControllerTest < ActionDispatch::IntegrationTest
  test "should get about" do
    get aboutpage_about_url
    assert_response :success
  end

end
