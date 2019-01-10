require 'test_helper'

class EdupageControllerTest < ActionDispatch::IntegrationTest
  test "should get edu" do
    get edupage_edu_url
    assert_response :success
  end

end
