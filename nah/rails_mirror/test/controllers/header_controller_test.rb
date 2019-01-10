require 'test_helper'

class HeaderControllerTest < ActionDispatch::IntegrationTest
  test "should get _header" do
    get header__header_url
    assert_response :success
  end

end
