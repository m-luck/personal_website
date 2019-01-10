require 'test_helper'

class NewspageControllerTest < ActionDispatch::IntegrationTest
  test "should get news" do
    get newspage_news_url
    assert_response :success
  end

end
