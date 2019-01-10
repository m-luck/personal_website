require 'test_helper'

class HeaderTailControllerTest < ActionDispatch::IntegrationTest
  test "should get _header_tail" do
    get header_tail__header_tail_url
    assert_response :success
  end

end
